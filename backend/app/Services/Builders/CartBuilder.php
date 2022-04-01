<?php


namespace App\Services\Builders;


use Illuminate\Database\Eloquent\Builder;

class CartBuilder extends Builder
{
    /**
     * @return $this
     */
    public function getCartModel(): self
    {
        // API doesn't have session id so we use a key from the client instead
        $clientKey = request()->header('Client-Key');

        if($clientKey) {
            $this->getCartModelBySessionId($clientKey);

            return $this;
        }
        // if ($user_id = \Auth::id()) {
            // $this->where('user_id', $user_id);
        // } else {
            $this->getCartModelBySessionId(session()->getId());
        // }

        return $this;
    }

    /**
     * @return $this
     */
    public function getCartModelBySessionId($sessionId): self
    {
        $this->where('session_id', $sessionId);
        return $this;
    }

    /**
     * @return $this
     */
    public function getCartModelByClientKey($clientKey): self
    {
        $this->where('session_id', $clientKey);
        return $this;
    }

    /**
     * @return $this
     */
    public function withCartItems(): self
    {
        $this->with('cartItems');
        return $this;
    }

    /**
     * @return $this
     */
    public function withCartItemsCount(): self
    {
        $this->withCount('cartItems');
        return $this;
    }

   

    /**
     * @return $this
     */
    public function getCartModelWithCartItems(): self
    {
        $this->withCartItems()
            ->withCartItemsCount()
            ->getCartModel();

        return $this;
    }
}
