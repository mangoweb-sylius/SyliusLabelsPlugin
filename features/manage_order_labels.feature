@manage_order_labels
Feature: Manage order labels
    In order to update order labels
    As an Administrator
    I want to be able to add and remove labels from order on orders list view and on order detail page

    Background:
        Given the store operates on a single channel in "United States"
        And I am logged in as an administrator
        And there is a customer "lucy@teamlucifer.com" that placed an order "#00000666"
        And there is a label with name "WIP"

    @ui
    Scenario: Being able to add label to order from orders list
        Given I am on "/admin/orders/"
        When I am browsing orders
        And I should see a single order from customer "lucy@teamlucifer.com"
        And I add label "WIP" to the order from customer "lucy@teamlucifer.com"
        Then I should be notified that current stock values were saved
        And I should see that the "Wyborowa Vodka Exquisite" variant has 4 quantity on hand
        And I should see that the "Torx T4" variant has "7" quantity on hand
