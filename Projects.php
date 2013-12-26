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

use Sculpin\Contrib\ProxySourceCollection\ProxySourceCollection;

/**
 * Projects Collection.
 *
 * @author Marco Vito Moscaritolo <marco@mavimo.org>
 * @author Beau Simensen <beau@dflydev.com>
 */
class Projects extends ProxySourceCollection
{
    public function init()
    {
        // We have special sorting rules for our items based on the date
        // and title. This assumes that the items are actually Post instances.
        uasort($this->items, function ($a, $b) {
            return strnatcmp($b->date().' '.$b->title(), $a->date().' '.$a->title());
        });

        parent::init();
    }
}
