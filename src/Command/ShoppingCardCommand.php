<?php

namespace App\Command;

use App\Model\Campaign;
use App\Model\Category;
use App\Model\Coupon;
use App\Model\Delivery;
use App\Model\Product;
use App\Service\DeliveryService;
use App\ShoppingCard\ShoppingCard;
use App\ShoppingCard\ShoppingItem;
use App\Service\ShoppingService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShoppingCardCommand extends Command
{
    protected static $defaultName = 'app:shopping-card';

    protected function configure()
    {
        $this->setDescription('Creates a shopping card.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $bagCategory = (new Category())->setTitle('Bag');
        $shirtCategory = (new Category())->setTitle('Shirt');

        $shirtProduct = (new Product())
            ->setTitle('Gri Gömlek')
            ->setPrice(49.99)
            ->setCategory($shirtCategory);

        $shirtProduct2 = (new Product())
            ->setTitle('Beyaz Gömlek')
            ->setPrice(59.99)
            ->setCategory($shirtCategory);

        $bagProduct = (new Product())
            ->setTitle('Siyah Çanta')
            ->setPrice(99.99)
            ->setCategory($bagCategory);

        $shoppingCard = (new ShoppingCard())->setItems([
            new ShoppingItem($shirtProduct, 1),
            new ShoppingItem($shirtProduct2, 3),
            new ShoppingItem($bagProduct, 2)
        ]);

        $bagCampaign = (new Campaign())
            ->setCategory($bagCategory)
            ->setDiscountAmount(10);

        $shirtCampaign = (new Campaign())
            ->setCategory($shirtCategory)
            ->setDiscountAmount(5);

        $shoppingService = new ShoppingService();
        $shoppingService->applyCampaigns($shoppingCard, [$bagCampaign, $shirtCampaign]);

        $coupon = (new Coupon())
            ->setMinimumAmount(75)
            ->setDiscountAmount(10);

        $shoppingService->applyCoupon($shoppingCard, $coupon);

        $delivery = (new Delivery())
            ->setCostPerDelivery(1)
            ->setCostPerProduct(2);

        $deliveryService = new DeliveryService($delivery);

        $deliveryCost = $deliveryService->deliveryCostCalculator(
            $shoppingCard->getDeliveryCount(),
            $shoppingCard->getItemCount()
        );

        $output->writeln('Basket Amount: ' . $shoppingCard->getTotalPrice());
        $output->writeln('Delivery Amount: ' . $deliveryCost);

        $totalPrice = $deliveryCost + $shoppingCard->getTotalPrice();
        $output->writeln('Total Amount: ' . $totalPrice);

        return Command::SUCCESS;
    }
}