<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * I stole this from
 * https://dev.to/charliet1802/transforming-api-requests-and-responses-in-laravel-11-the-easy-way-21i5
 */
class TransformApiResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response->isSuccessful() && $response->headers->get('Content-Type') === 'application/json')
        {
            $data = json_decode($response->getContent(), true);
            if ($data)
            {
                $transformData = $this->transformKeysToCamelCase($data);
                $response->setContent(json_encode($transformData));
            }
        }

        return $response;
    }

    /**
     * Transform keys of an array to camelCase.
     *
     * @param  array  $data
     * @return array
     */
    private function transformKeysToCamelCase($data): array
    {
        $result = [];
        foreach ($data as $key => $value)
        {
            $camelKey = Str::camel($key);
            $result[$camelKey] = is_array($value) ? $this->transformKeysToCamelCase($value) : $value;
        }
        return $result;
    }
}
