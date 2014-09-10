<?php namespace Fawkes\Fenix;


use Cache, Auth;
use LaravelOAuth\Decorators\OAuth2\FenixEduDecorator;

class FenixEduCacheDecorator extends FenixEduDecorator {

    /**
     * Performs a HTTP request and JSON decodes the result.
     *
     * @param        $path
     * @param string $method
     * @param null   $body
     * @param array  $extraHeaders
     *
     * @return mixed
     */
    public function requestJSONWithoutCache($path, $method = 'GET', $body = null, array $extraHeaders = [])
    {
        return parent::requestJSON($path, $method, $body, $extraHeaders);
    }

    /**
     * Checks if the given request is present in the Cache and returns it. If it's not present,
     * makes and HTTP request and then stores the result in the Cache.
     *
     * @param        $path
     * @param string $method
     * @param null   $body
     * @param array  $extraHeaders
     *
     * @return mixed
     */
    public function requestJSON($path, $method = 'GET', $body = null, array $extraHeaders = [])
    {
        if ( ! $key = $this->generateCacheKeyForRequest($path))
        {
            return $this->requestJSONWithoutCache($path, $method, $body, $extraHeaders);
        }

        if (Cache::has($key)) return Cache::get($key);

        $response = $this->requestJSONWithoutCache($path, $method, $body, $extraHeaders);

        // FIXME: cache time - current is two days
        Cache::put($key, $response, 3600 * 48);

        return $response;
    }

    public function generateCacheKeyForRequest($path)
    {
        $key = $path;

        if ($this->isPersonDependentRequest($key))
        {
            if ( ! Auth::check())
            {
                return false;
            }

            $key = $this->addPersonIdentifierToCacheKey($key);
        }

        return preg_replace('/\//', '.', $key);
    }

    public function generateCacheTagsForRequest($path)
    {
        return [];
    }

    private function isPersonDependentRequest($key)
    {
        return starts_with($key, 'person');
    }

    private function addPersonIdentifierToCacheKey($key)
    {
        $username = Auth::user()->username;
        return preg_replace('/person/', "person.{$username}", $key);
    }
}