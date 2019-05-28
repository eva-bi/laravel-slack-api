<?php namespace Tuanla\Laravel\SlackWebApi\Http;

class SlackResponseFactory implements \Tuanla\Laravel\SlackWebApi\Contracts\Http\ResponseFactory {

    /**
     * {@inheritdoc}
     */
    public function build($body, array $headers, $statusCode)
    {
        return new SlackResponse($body, $headers, $statusCode);
    }

}
