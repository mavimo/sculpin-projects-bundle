<?php

/*
 * This file is a part of Sculpin.
 *
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mavimo\Bundle\ProjectsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Sculpin Projects Extension.
 *
 * @author Marco Vito Moscaritolo <marco@mavimo.org>
 * @author Beau Simensen <beau@dflydev.com>
 */
class SculpinProjectsExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration;
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('sculpin_projects.paths', $config['paths']);

        if (isset($config['permalink'])) {
            $container->setParameter('sculpin_projects.permalink', $config['permalink']);
        }
        if (isset($config['layout'])) {
            $container->setParameter('sculpin_projects.layout', $config['layout']);
        } else {
            $container->setParameter('sculpin_projects.layout', null);
        }
        if (null !== $config['publish_drafts']) {
            $container->setParameter('sculpin_projects.publish_drafts', $config['publish_drafts']);
        } else {
            $container->setParameter('sculpin_projects.publish_drafts', 'prod' !== $container->getParameter('kernel.environment'));
        }
    }
}
