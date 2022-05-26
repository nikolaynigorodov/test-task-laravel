<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helper\UserApiMessageHelper;
use App\Http\Helper\UserApiValidateHelper;
use App\Http\Resources\UserApiResource;
use App\Http\Validator\UserApiIndexValidate;
use App\Http\Validator\UserApiStoreValidate;
use App\Models\User;
use App\Repository\TokenRepository;
use App\Repository\UserRepository;
use App\Services\TinyPngService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    const MIN_COUNT_OF_PAGE = 1;
    /**
     * @var UserApiValidateHelper
     */
    private $apiValidateHelper;

    private $offsetCheck = false;
    /**
     * @var UserApiMessageHelper
     */
    private $apiMessageHelper;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var TinyPngService
     */
    private $tinyPngService;
    /**
     * @var TokenRepository
     */
    private $tokenRepository;

    public function __construct(
        UserApiValidateHelper $apiValidateHelper,
        UserApiMessageHelper $apiMessageHelper,
        UserRepository $userRepository,
        TinyPngService $tinyPngService,
        TokenRepository $tokenRepository
    )
    {
        $this->apiValidateHelper = $apiValidateHelper;
        $this->apiMessageHelper = $apiMessageHelper;
        $this->userRepository = $userRepository;
        $this->tinyPngService = $tinyPngService;
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if (!$request->get('count')) {
            $request->request->add(['count' => self::MIN_COUNT_OF_PAGE]);
        }

        $validate = $this->apiValidateHelper->validate($request, new UserApiIndexValidate())->getMessage();
        if(!empty($validate)) {
            return response()->json($validate, 422);
        }

        if(!$request->get('offset')) {
            $users = UserApiResource::collection(User::orderBy('id', 'desc')->paginate($request->get('count')));
        } else {
            $request->request->remove('page');
            $this->offsetCheck = true;
            $users = UserApiResource::collection(
                User::orderBy('id', 'desc')->offset($request->get('offset'))->limit($request->get('count'))->get()
            );
        }

        $checkPageNotFound = $this->apiMessageHelper->checkUser($users->count())->getMessage();
        if(!empty($checkPageNotFound)) {
            return response()->json($checkPageNotFound, 404);
        }

        $response = [
            "success" => true,
            'page' => !($this->offsetCheck) ? $users->currentPage() : null,
            'total_pages' => !($this->offsetCheck) ? $users->lastPage() : null,
            'total_users' => !($this->offsetCheck) ? $users->total() : User::all()->count(),
            "count" => $users->count(),
            "links" => [
                'next_url' => !($this->offsetCheck) ? $users->nextPageUrl() : null,
                'prev_url' => !($this->offsetCheck) ? $users->previousPageUrl() : null,
            ],
            'users' => !($this->offsetCheck) ? $users->items() : $users
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $token = $request->header('Token');
        if(!$token) {
            return response()->json($this->apiMessageHelper->tokenNull()->getMessage(), 401);
        }

        $modelToken = $this->tokenRepository->findToken($token);
        if($modelToken->count() == 0) {
            $this->tokenRepository->removeToken($token);
            return response()->json($this->apiMessageHelper->tokenExpired()->getMessage(), 401);
        }

        $fileImage = $this->tinyPngService->downloadAndResize($request->get('photo'));
        if($fileImage !== null) {
            $request->request->add(['photo' => $fileImage['file']]);
            $validate = $this->apiValidateHelper->validate($request, new UserApiStoreValidate())->getMessage();

            if(!empty($validate)) {
                return response()->json($validate, 422);
            }

            $request->request->add(['photo' => $fileImage['name']]);
            $user = $this->userRepository->created($request->all());
            $this->tokenRepository->removeToken($token);
            return response()->json($this->apiMessageHelper->registerSuccess($user)->getMessage(), 200);
        } else {
            return response()->json($this->apiMessageHelper->imagesUrlBad()->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        if(!is_numeric($id)) {
            return response()->json($this->apiMessageHelper->showUserValidFails()->getMessage(), 400);
        }

        $user = new UserApiResource(User::find($id));

        if($user->resource === null) {
            return response()->json($this->apiMessageHelper->showUserNotFound()->getMessage(), 404);
        }

        return response()->json($this->apiMessageHelper->showUserSuccess($user)->getMessage(), 200);

    }
}
