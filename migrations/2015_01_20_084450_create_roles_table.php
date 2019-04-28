Ñ:::::::::::::::::::::::::::::::::::::::::::::::::::::......··





















































<56 function up()bvvvvvvv                             vijkkkkkkkkkkkk

    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <56 function down()
    {
        Schema::drop('roles');
    }
}
