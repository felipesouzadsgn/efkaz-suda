<?php

    $sessionID = 'dyego';// session()->get('visitHash');
?>

<?= $this->extend('layouts/simulador') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        .main-content {
            max-width: 980px;
        }
		.rating-container {
		    background-color: #fff;
		    padding: 20px;
		    border-radius: 8px;
		    text-align: center;
		    max-width: 300px;
		    margin: 0 auto;
		}

		.stars {
		    display: flex;
		    justify-content: center;
		    margin-bottom: 10px;
		}

		.star {
		    font-size: 24px;
		    cursor: pointer;
		    color: #ccc;
		}
		.star.hovered,
		.star.selected {
		    color: #f1c40f;
		}
    </style>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script>
   $(document).ready(function() {

    $('.star').on('click', function() {
        var ratingValue = $(this).data('value');
        $(this).siblings().removeClass('selected');
        $(this).prevAll().addBack().addClass('selected');        
        id = '#input-'+$(this).parent().attr('id');
        $(id).val($(this).data('value'));

    });

  	$('.star').on('mouseenter', function() {
        $(this).prevAll().addBack().addClass('hovered');
    }).on('mouseleave', function() {
        $(this).prevAll().addBack().removeClass('hovered');
    });

    $('form').on('submit', function() {
        var rating1 = $('#rating1 .selected').last().data('value');
        var rating2 = $('#rating2 .selected').last().data('value');
    });

});
</script>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="container p-5 bg-light">
    
    <form action="<?= base_url('/simulador/obrigado') ?>" method="post">

        <input type="text" name="rating_1" id="input-rating-1" value="">
        <input type="text" name="rating_2" id="input-rating-2" value="">


        <h1 class="mb-3">Obrigado {nome},<br> deixe sua opinião!</h1>

        <div class="row p-3">
        	 <div class="rating-container">

        	 	<div class="row">
			        <p>O que achou dos produtos?</p>
			        <div class="stars" id="rating-1">
			            <span class="star" data-value="1"><i class="fa-solid fa-star"></i></span>
			            <span class="star" data-value="2"><i class="fa-solid fa-star"></i></span>
			            <span class="star" data-value="3"><i class="fa-solid fa-star"></i></span>
			            <span class="star" data-value="4"><i class="fa-solid fa-star"></i></span>
			            <span class="star" data-value="5"><i class="fa-solid fa-star"></i></span>
			        </div>
			        <div class="comentario d-none">
			        	<textarea name="" id=""></textarea>
			        </div>
			    </div>
			    <div class="row">
			        <p>O que achou da experiência?</p>
			        <div class="stars" id="rating-2">
			            <span class="star" data-value="1"><i class="fa-solid fa-star"></i></span>
			            <span class="star" data-value="2"><i class="fa-solid fa-star"></i></span>
			            <span class="star" data-value="3"><i class="fa-solid fa-star"></i></span>
			            <span class="star" data-value="4"><i class="fa-solid fa-star"></i></span>
			            <span class="star" data-value="5"><i class="fa-solid fa-star"></i></span>
			        </div>
			        <div class="comentario d-none">
			        	<textarea name="" id=""></textarea>
			        </div>
				</div>
		    </div>
        </div>


        <div class="row mt-5">
            <button type="submit" id="btn-cadastro" class="btn btn-primary btn-lg btn-full-width btn-obrigado mb-2">Enviar</button>
        </div>

    </form>
</div>
<?= $this->endSection() ?>
