<?php

namespace App\Services;

/**
 * Class MenuService
 * Service for managing menu items
 * 
 * @package App\Services
 */
class MenuService
{
    /**
     * Array to store menu items.
     *
     * @var array
     */
    protected $menuItems = [];

    /**
     * Add a new menu item.
     *
     * @param string $name The display name of the menu item
     * @param string $route The route the menu item should link to
     * @param bool $requiresProjectSelected Whether the menu item requires a project to be selected
     * @param int $order The order in which this item should appear (optional)
     * @return void
     */
    public function addMenuItem(string $name, string $route, bool $requiresProjectSelected = false, int $order = 100)
    {
        $this->menuItems[] = [
            'name' => $name,
            'route' => $route,
            'requiresProjectSelected' => $requiresProjectSelected,
            'order' => $order,
        ];
    }

    /**
     * Get all menu items.
     *
     * @param bool $sort Whether to sort the menu items by order
     * @return array
     */
    public function getMenuItems($sort = true)
    {
        if ($sort) {
            usort($this->menuItems, function($a, $b) {
                return $a['order'] <=> $b['order'];
            });
        }
        return $this->menuItems;
    }

    /**
     * Remove a menu item by its name.
     *
     * @param string $name The name of the menu item to remove
     * @return void
     */
    public function removeMenuItem($name)
    {
        $this->menuItems = array_filter($this->menuItems, function($item) use ($name) {
            return $item['name'] !== $name;
        });
    }

    /**
     * Update an existing menu item.
     *
     * @param string $name The name of the menu item to update
     * @param array $newData The new data for the menu item
     * @return void
     */
    public function updateMenuItem($name, array $newData)
    {
        foreach ($this->menuItems as &$item) {
            if ($item['name'] === $name) {
                $item = array_merge($item, $newData);
                break;
            }
        }
    }
}
