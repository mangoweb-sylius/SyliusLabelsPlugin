<?php

declare(strict_types=1);

namespace MangoSylius\LabelsPlugin\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

class AdminMenuListener
{
	public function addAdminMenuItems(MenuBuilderEvent $event): void
	{
		$menu = $event->getMenu();
		assert($menu->getChild('configuration') instanceof ItemInterface);

		$menu->getChild('configuration')
			->addChild('labels', ['route' => 'mangoweb_labels_plugin_admin_label_index'])
			->setLabel('mango-sylius.admin.label.menu')
			->setLabelAttribute('icon', 'flag')
		;
	}
}
