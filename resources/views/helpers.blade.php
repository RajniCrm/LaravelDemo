 @extends("admin.include.header")
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

    <!--   <canvas class="w-100" id="myChart" width="900" height="auto"></canvas> -->
      
      <h2> Create Helpers </h2>
      <div class="row col-md-12">
        <ol>
          <li>Create Helpers.php file in App/Http/controllers</li>
          <li>Add the path in composer.php below the psr-4 variable as 
            <p>
                "files":[ 
                    "app/Http/Controllers/Helpers.php" 
                ]
            </p>
          </li>
          <li>Run the composer command : composer dump-auto </li>
        </ol>
      </div>
      <h2> Use and calling of Helpers </h2>
       <div class="row col-md-12">
        <ol>
          <li>create the function in any controller</li>
          <li>Use the helper file as : use Helpers</li>
          <li>call the function as  : $test = Helpers::sample_function();</li>
          <li>Hit the url</li>
        </ol>
      </div>
    </main>