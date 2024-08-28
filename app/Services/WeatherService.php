<?php
namespace App\Services;

class WeatherService
{
    public function getWeather($location)
    {
        // This is just an example. In a real-world application, you might call an API.
        return "The weather in {$location} is sunny.";
    }
    public function getWeathers($location)
    {
        // This is just an example. In a real-world application, you might call an API.
        return "The weather in {$location} is sunny.";
    }
}