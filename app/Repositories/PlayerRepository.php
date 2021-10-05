<?php

namespace App\Repositories;

use App\Http\Requests\Players\PlayerStoreRequest;
use App\Models\Player;
use JetBrains\PhpStorm\Pure;
use Exception;

/**
 * Class PlayerRepository
 * @package App\Repositories
 */
class PlayerRepository extends AbstractRepository
{
    /**
     * Attractions constructor.
     *
     * @param Player $model
     */
    #[Pure] public function __construct(Player $model)
    {
        parent::__construct($model);
    }

    /**
     * @throws Exception
     */
    public function createWithAvatar(PlayerStoreRequest $request)
    {
        // First we store the item by calling the parent
        $player = parent::create($request->validated());

        // Store image to drive and add file path to request object
        if ($request->file('file')) {
            $player['image'] = 'storage/players/' . $request->file('file')->hashName();
            $request->file('file')->storePublicly('public/players');
            $player->save();
        }

    }

    /**
     * @throws Exception
     */
    public function deleteWithAvatar(Player $player)
    {
        // Check if we need to delete the player avatar
        if (!is_null($player->image)) {
            dd('TODO: Delete image if exists');
        }

        // Lastly remove the player from the database
        parent::delete($player);
    }

}
