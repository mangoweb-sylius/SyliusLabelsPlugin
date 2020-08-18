<?php

declare(strict_types=1);

namespace MangoSylius\LabelsPlugin\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Liip\ImagineBundle\Exception\Config\Filter\NotFoundException;
use MangoSylius\ExtendedChannelsPlugin\Service\ProductDuplicatorInterface;
use MangoSylius\LabelsPlugin\Entity\LabelInterface;
use MangoSylius\LabelsPlugin\Entity\OrderInterface;
use MangoSylius\LabelsPlugin\Repository\LabelRepositoryInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxLabelsController
{
    /**
     * @var OrderRepositoryInterface
     */
	private $orderRepository;

    /**
     * @var EventDispatcherInterface
     */
	private $eventDispatcher;

    /**
     * @var LabelRepositoryInterface
     */
	private $labelRepository;

    /**
     * @var EntityManagerInterface
     */
	private $entityManager;

	public function __construct(
        EventDispatcherInterface $eventDispatcher,
        OrderRepositoryInterface $orderRepository,
        LabelRepositoryInterface $labelRepository,
        EntityManagerInterface $entityManager
	) {
		$this->eventDispatcher = $eventDispatcher;
		$this->orderRepository = $orderRepository;
		$this->labelRepository = $labelRepository;
		$this->entityManager = $entityManager;
	}

	public function saveOrderLabels($orderId, Request $request): Response
	{
	    $order = $this->orderRepository->find($orderId);
		if ($order === null) {
			throw new NotFoundException();
		}
		assert($order instanceof OrderInterface);

        $labelsIds = array_filter(explode(',', $request->getContent()));

		$labels = [];
		foreach ($labelsIds as $labelId) {
            $label = $this->labelRepository->find($labelId);
            if ($label === null) {
			    throw new NotFoundException();
            }
		    assert($label instanceof LabelInterface);
            $labels[] = $label;
        }

		$oldLabels = $order->getLabels();
		$order->setLabels($labels);

		$event = new GenericEvent($order, [
		    'oldLabels' => $oldLabels,
            'newLabels' => $labels,
        ]);
		$this->eventDispatcher->dispatch('mango-sylius-labels.save.order.before-persist', $event);
		$this->entityManager->flush();
		$this->eventDispatcher->dispatch('mango-sylius-labels.save.order.after-persist', $event);

		return new Response('', 204);
	}
}
