<?php

class PokerLadder
{
    function isStraight($cards): string|bool
    {
        try{
            if($this->validNumberOfCards($cards)){
                $cleanLadder = [];
                $cards = array_unique($cards);
                $containsFourteen = in_array(14, $cards);
                $counter = 0;
                sort($cards);
                foreach ($cards as $keyCard => $card){
                    if($counter == 0){
                        $cleanLadder[] = $card;
                    }

                    $nextCard = $keyCard + 1;
                    $valueExists = array_key_exists($nextCard, $cards);

                    if($valueExists){
                        $res = $card - $cards[$nextCard];
                        if ($res === -1) {
                            $cleanLadder[] = $cards[$nextCard];
                            $counter++;
                        } else {
                            if(count($cleanLadder) < 4){
                                $cleanLadder = [];
                                $counter = 0;
                            }
                        }
                    }
                }

                return $this->validateLadder([
                    'newLadderArray' => $cleanLadder,
                    'containsWildcard' => $containsFourteen
                ]);
            }else{
                return false;
            }
        }catch(Throwable $th){
            return $th->getMessage();
        }
    }

    function validNumberOfCards(array $cards): bool|string
    {
        try{
            return sizeof($cards) >= 5 && sizeof($cards) <= 7;
        }catch(Throwable $th){
            return $th->getMessage();
        }

    }

    function validateLadder(array $checkLadderParams): bool|string
    {
        try{
            if(count($checkLadderParams['newLadderArray']) >= 5){
                $isStraight = true;
            }elseif($checkLadderParams['containsWildcard']){
                if(min($checkLadderParams['newLadderArray']) == 2){
                    array_unshift($checkLadderParams['newLadderArray'], 1);
                    $isStraight = true;
                }else{
                    $isStraight = false;
                }
            }else{
                $isStraight = false;
            }

            return $isStraight;
        }catch (Throwable $th){
            return $th->getMessage();
        }
    }
}