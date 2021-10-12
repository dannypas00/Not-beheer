<?php

namespace App\Repositories;

use App\Handlers\PlayerHandler;
use App\Http\Requests\Players\PlayerStoreRequest;
use App\Models\Fixture;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
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
            $player['image'] = 'avatars/' . $request->file('file')->hashName();
            $request->file('file')->storePublicly('public/avatars');
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
            // Check if file still exists
            if (Storage::disk('public')->exists($player->image)) {
                Storage::disk('public')->delete($player->image);
            }
        }

        // Lastly remove the player from the database
        parent::delete($player);
    }
}
