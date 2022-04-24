<?php ob_start();?>
	<h2 class="d-flex justify-content-center mb-5 mt-4 text-white">Games</h2>
    <div class="row mb-5">
    <ul class="game-cards gamesRow">
                
<?php $contador = 0;?>
<?php foreach ($params as $param): ?>
<?php $contador++;
if($contador >= 4){
    echo "</ul>";
    echo "<ul class='game-cards gamesRow'>";
    $contador = 0;
}
?>

		<li class="liCards">
                        <div class="game-card">
                            <div class="game-card__front">
                                <div class="game-card__header">
                                    <div class="game-card__cover">
                                        <div class="game-card__image-placeholder">
                                            <img src="./img/videogames/<?php echo $param["game_id"] ?>.jpg" alt="" width="100%" height="100%">
                                        </div>
                                    </div>
                                    <div class="game-card__title"><?php echo $param["title"] ?></div>
                                </div>
                            </div>
                
                            <div class="game-card__back">
                                <div class="game-card__content">
                                    <div class="game-card__price">
                                        <i class="fa fa-money-bill" aria-hidden="true"></i>
                                        
                                    </div>
                                    <div class="game-card__buttons">
                                        <button class="game-card__button -play">
                                            <i class="fa fa-money-bill-wave" aria-hidden="true"></i>
                                            <?php echo $param["price"] . "€"?>
                                        </button>
                                        <button class="game-card__button" aria-label="More">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
<?php endforeach;?>
</div>
<?php $contenido = ob_get_clean()?>
<?php include 'layout.php';?>