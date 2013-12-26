<?php

/*
 * This file is a part of Sculpin.
 *
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mavimo\Bundle\ProjectsBundle;

use Mavimo\Bundle\ProjectsBundle\DependencyInjection\Compiler\ProjectsMapPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Sculpin Projects Bundle.
 *
 * @author Marco Vito Moscaritolo <marco@mavimo.org>
 * @author Beau Simensen <beau@dflydev.com>
 */
class SculpinProjectsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ProjectsMapPass);
    }
}
