<?php

function set_active($path, $active = 'active')
{
    return request()->is($path) ? $active : '';
}
