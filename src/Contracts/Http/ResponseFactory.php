<?php namespace Tuanla\Laravel\SlackWebApi\Contracts\Http;

interface ResponseFactory {

    /**
     * Builds the response.
     *
     * @param  string  $body
     * @param  array   $headers
     * @param  integer $statusCode
     * @return \Tuanla\Laravel\SlackWebApi\Contracts\Http\Response
     */
    public function build($body, array $headers, $statusCode);

}
