<?php


namespace App\Http\Controllers\api\admin;


use Psr\Http\Message\ServerRequestInterface;
use Laravel\Passport\Http\Controllers\AccessTokenController;

/**
 * @group  login management
 * APIs for managing login
 */


class CustomAccessTokenController extends AccessTokenController
{
    /**
     * Hooks in before the AccessTokenController issues a token
     *
     *
     * @param  ServerRequestInterface $request
     * @return mixed
     */

    /**
     * login
     * @bodyParam scope string required *.
     * @bodyParam grant_type string required password.
     * @bodyParam client_id integer required 2.
     * @bodyParam client_secret string required YegNgvzBu4FgpJUDS4IesSWMgkuZ5p9o1DiOMeJu.
     * @bodyParam username string required.
     * @bodyParam password string required.
     * @response {"data":{
     *      "token_type": Bearer,
     *      "expires_in": 1111,
     *      "access_token": 22222,
     * },
     * "message": " successful"
     *
     * @response  422 {
     *  "message": "errors",
     *  "errors": []
     * }
     * @response  500 {
     *  "message": "errors",
     *  "errors": []
     * }
     * @param ServerRequestInterface $request
     * @return \Illuminate\Http\Response
     */
    public function issueUserToken(ServerRequestInterface $request)
    {
        $httpRequest = request();

        // 1.
        if ($httpRequest->grant_type == 'password') {
            // 2.

            $user = \App\Models\User::where('email', $httpRequest->username)->first();

            return $this->issueToken($request);


        }
    }
}
