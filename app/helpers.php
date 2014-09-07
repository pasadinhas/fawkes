<?php

function login_url()
{
    return (string) App::make('oauth')->consumer('FenixEdu')->getAuthorizationUri();
}