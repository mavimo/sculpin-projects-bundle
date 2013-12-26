<?php

namespace Mavimo\Bundle\ProjectsBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ProjectsMapPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('sculpin_projects.projects_map')) {
            return;
        }

        $definition = $container->getDefinition('sculpin_projects.projects_map');

        foreach ($container->findTaggedServiceIds('sculpin_projects.projects_map') as $id => $tagAttributes) {
            foreach ($tagAttributes as $attributes) {
                $definition->addMethodCall('addMap', array(new Reference($id)));
            }
        }
    }
}
