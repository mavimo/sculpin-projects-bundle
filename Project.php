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

use Sculpin\Contrib\ProxySourceCollection\ProxySourceItem;

/**
 * Project.
 *
 * @author Marco Vito Moscaritolo <marco@mavimo.org>
 * @author Beau Simensen <beau@dflydev.com>
 */
class Project extends ProxySourceItem
{
    public function date()
    {
        return $this->data()->get('calculated_date');
    }

    public function title()
    {
        return $this->data()->get('title');
    }

    public function previousProject()
    {
        return $this->previousItem();
    }

    public function setPreviousItem(ProxySourceItem $item = null)
    {
        parent::setPreviousItem($item);

        // expose additional metadata
        $this->data()->set('previous_project', $item);
    }

    public function nextProject()
    {
        return $this->nextItem();
    }

    public function setNextItem(ProxySourceItem $item = null)
    {
        parent::setNextItem($item);

        // expose additional metadata
        $this->data()->set('next_project', $item);
    }
}
