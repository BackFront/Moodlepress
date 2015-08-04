<?php
Load( ["UserRole" ] );

$Premium = new UserRole;
$Cursista = new UserRole;
$Aluno = new UserRole;

$Premium->addRole( "wp_premium", "Premium" );
$Cursista->addRole( "wp_cursista", "Cursista" );
$Aluno->addRole( "wp_aluno", "Aluno" );
