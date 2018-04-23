<?php

/**
 * Description of ProviderInterface
 *
 * @author: Awoyo Oluwatoyin Stephen alias AwoyoToyin <awoyotoyin@gmail.com>
 */
namespace App\Provider;

use Common\Provider\AbstractProvider;

class PostProvider extends AbstractProvider
{
    protected $entityClass = 'App\Entity\Post';
}
