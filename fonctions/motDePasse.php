<?php

function motDePasse($tentative)
{
	return ($tentative == 'maitrise');
}
function motDePasse2($tentative,$sol)
{
	return ($tentative == $sol);
}
?>