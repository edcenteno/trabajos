<?php

# El script del cliente

# Creamos el cliente gearman
$gmc= new GearmanClient();

# Añade el servidor de trabajos por defecto
$gmc->addServer();

# Establece un par de llamadas de retorno de modo que pueda seguirse el progreso
$gmc->setCompleteCallback("reverse_complete");
$gmc->setStatusCallback("reverse_status");

# Añade una tarea para la función "reverse"
$task= $gmc->addTask("reverse", "Hello World!", null, "1");

# Añade otra tarea, pero esta se ejecuta en segundo plano
$task= $gmc->addTaskBackground("reverse", "!dlroW olleH", null, "2");

if (! $gmc->runTasks())
{
    echo "ERROR " . $gmc->error() . "\n";
    exit;
}

echo "DONE\n";

function reverse_status($task)
{
    echo "STATUS: " . $task->unique() . ", " . $task->jobHandle() . " - " . $task->taskNumerator() .
         "/" . $task->taskDenominator() . "\n";
}

function reverse_complete($task)
{
    echo "COMPLETE: " . $task->unique() . ", " . $task->data() . "\n";
}

?>
<?php

# El script del trabajador

echo "Starting\n";

# Creamos el objeto trabajador
$gmworker= new GearmanWorker();

# Añade el servidor por defecto (localhost)
$gmworker->addServer();

# Registra la función "reverse" en el servidor
$gmworker->addFunction("reverse", "reverse_fn");

print "Waiting for job...\n";
while($gmworker->work())
{
  if ($gmworker->returnCode() != GEARMAN_SUCCESS)
  {
    echo "return_code: " . $gmworker->returnCode() . "\n";
    break;
  }
}

function reverse_fn($job)
{
  echo "Received job: " . $job->handle() . "\n";

  $workload = $job->workload();
  $workload_size = $job->workloadSize();

  echo "Workload: $workload ($workload_size)\n";

  # Este bucle de estado no es neceasario, únicamente muestra cómo funciona
  for ($x= 0; $x < $workload_size; $x++)
  {
    echo "Sending status: " . $x + 1 . "/$workload_size complete\n";
    $job->sendStatus($x+1, $workload_size);
    $job->sendData(substr($workload, $x, 1));
    sleep(1);
  }

  $result= strrev($workload);
  echo "Result: $result\n";

  # Retorna lo que se quiere enviar al cliente
  return $result;
}

?>