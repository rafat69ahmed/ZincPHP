<?php
  // Check if a env file already exists.
  if( file_exists( './app/environment.json' ) ) {
    echo "environment.json already exists, do you want to overwrite?(Y/n) ";
    $handle = fopen( "php://stdin", "r" );
    $cont   = trim( fgets( $handle ) );
    if( strtolower( $cont ) == 'y' ) {
      echo "Overwriting environment.json file ...";
      \OuputCLI\nl();
    } else {
      echo "Action canceled";
      \OuputCLI\nl();
      exit();
    }
  }
  // Create the new environment.json file.
  $default_env = json_decode( file_get_contents( './app/core/zinc_structures/environment.json.example' ) );
  $default_env->secret_keys = bin2hex( random_bytes( 64 ) );
  file_put_contents( './app/environment.json', json_encode( $default_env, JSON_PRETTY_PRINT ) );
  echo \OuputCLI\success( "Environment document has created." );
  \OuputCLI\nl();
  exit();