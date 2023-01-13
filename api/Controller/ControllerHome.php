<?php
use OpenApi\Examples\UsingRefs\Model;
Class ControllerHome {
    private ModelHome $modelHome;
    function __construct() {
        $this->modelHome = new ModelHome;
    }

    /**
     * 
     * @OA\Get(path="/",
     *     tags={"Home"},
     *     summary="Return a welcome message",
     *     description="Base of the api",
     *     operationId="getHome",
     *     parameters={},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *          @OA\Schema(
     *             type="array",
     *             @OA\Schema(ref="#/components/schemas/Home"),
     *              
     *         ),
     *     ),
     *      @OA\Response(
     *         response="400",
     *         description="unsuccessful operation",
     *     ),
     * )
     */
    public function home(): void
    {
        $message = $this->modelHome->getMessage();
        ModelSendResponse::sendResponse(array("home" => $message));
    }
}