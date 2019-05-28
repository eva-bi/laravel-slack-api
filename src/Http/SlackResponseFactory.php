<?php namespace Tuanla\Slack\Http;

class SlackResponseFactory implements \Tuanla\Slack\Contracts\Http\ResponseFactory {

    /**
     * {@inheritdoc}
     */
    public function build($body, array $headers, $statusCode)
    {
        return new SlackResponse($body, $headers, $statusCode);
    }

}
