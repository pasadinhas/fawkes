<?php

function login_url()
{
    return (string) App::make('oauth')->make('FenixEdu')->getAuthorizationUri();
}