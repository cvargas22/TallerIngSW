<?php

namespace Acme\EstadisticaBundle\Controller;

use Acme\PrestamoBundle\Entity\Prestamo;
use Acme\LectorBundle\Entity\Lector;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EstadisticaBundle:Default:index.html.twig', array('name' => $name));
    }

	public function sexoAction(Request $request)
	{

		$MesI = $request->get('MesI');
		$MesT = $request->get('MesT');

		if ($MesI) {
			$monthI = substr($MesI, -2);
			$monthT = substr($MesT, -2);
			$meses = array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			if ($MesI == $MesT) {
				$titulo = "en el Mes de ".$meses[(int)$monthI]." de ".substr($MesI, 0,4);
			}
			else{
				$titulo = "entre los Meses de ".$meses[(int)$monthI]." y ".$meses[(int)$monthT];
			}
			$em = $this->getDoctrine()->getManager();
			$qb = $em->createQueryBuilder();
			$date_from = new \DateTime($MesI.'-01');
			$date_to = new \DateTime($MesT.'-31');
			$query = $qb->select('s')
	            ->from('Acme\PrestamoBundle\Entity\Prestamo', 's')
	            ->where('s.fechaPrestamo >= :date_from')
	            ->andWhere('s.fechaPrestamo <= :date_to')
	            ->setParameter('date_from', $date_from, \Doctrine\DBAL\Types\Type::DATETIME)
	            ->setParameter('date_to', $date_to, \Doctrine\DBAL\Types\Type::DATETIME)
	            //->andWhere($qb->expr()->between('s.date', ':date_from', ':date_to'));
	            ->getQuery();
			echo ' ';
	        $prestamos = $query->getResult();
	        $numprest = sizeof($prestamos);
	        $femenino = 0;
	        $masculino = 0;
	        $otro = 0;
	        for ($i = 0; $i<sizeof($prestamos);$i++){
				$lector = $prestamos[$i]->getLector();
				//echo $lector;
				if ($lector->getSexo() == 1){
					$femenino += 1;
				}
				if ($lector->getSexo() == 2){
					$masculino += 1;
				}
				if ($lector->getSexo() == 3){
					$otro += 1;
				}
	        }

		    $ob = new Highchart();
			$ob->chart->renderTo('linechart');
			$ob->title->text('Cantidad de Préstamos según sexo '.$titulo);
			$ob->subtitle->text('Total: '.sizeof($prestamos).' préstamos');
			$ob->plotOptions->pie(array(
			    'allowPointSelect'  => true,
			    'cursor'    => 'pointer',
			    'dataLabels'    => array('enabled' => true),
			    'showInLegend'  => true
			));
			$data = array(
			    array('Femenino', $femenino),
			    array('Masculino', $masculino),
			    array('Otro', $otro),

			);
			$ob->series(array(array('type' => 'pie','name' => 'Cantidad Prestamos', 'data' => $data)));
			return $this->render('EstadisticaBundle:Default:grafico.html.twig', array(
		        'chart' => $ob
		    ));
		}


		return $this->render('EstadisticaBundle:Default:index.html.twig');

	}

	public function edadAction(Request $request)
	{
		$MesI = $request->get('MesI');
		$MesT = $request->get('MesT');
		if ($MesI) {
			$monthI = substr($MesI, -2);
			$monthT = substr($MesT, -2);
			$meses = array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			if ($MesI == $MesT) {
				$titulo = "en el Mes de ".$meses[(int)$monthI]." de ".substr($MesI, 0,4);
			}
			else{
				$titulo = "entre los Meses de ".$meses[(int)$monthI]." y ".$meses[(int)$monthT];
			}
			$em = $this->getDoctrine()->getManager();
			$qb = $em->createQueryBuilder();
			$date_from = new \DateTime($MesI.'-01');
			$date_to = new \DateTime($MesT.'-31');
			$query = $qb->select('s')
	            ->from('Acme\PrestamoBundle\Entity\Prestamo', 's')
	            ->where('s.fechaPrestamo >= :date_from')
	            ->andWhere('s.fechaPrestamo <= :date_to')
	            ->setParameter('date_from', $date_from, \Doctrine\DBAL\Types\Type::DATETIME)
	            ->setParameter('date_to', $date_to, \Doctrine\DBAL\Types\Type::DATETIME)
	            //->andWhere($qb->expr()->between('s.date', ':date_from', ':date_to'));
	            ->getQuery();
			echo ' ';
	        $prestamos = $query->getResult();
	        
	       	$categories = array(" < 17", "18-25", "26-30", "31-35", "36-40", "41-45", "46-50", "51-55", "56-60", "61-70", "> 70");
	       	$data = array(0,0,0,0,0,0,0,0,0,0,0);

	        $j=0;
	        for ($i = 0; $i<sizeof($prestamos);$i++){
	        	$lector = $prestamos[$i]->getLector();
	        	$fnac = $lector->getFnac();
	        	list($ano,$mes,$dia) = explode("-",$fnac);
				$ano_diferencia  = date("Y") - $ano;
				$mes_diferencia = date("m") - $mes;
				$dia_diferencia   = date("d") - $dia;
				if ($dia_diferencia < 0 || $mes_diferencia < 0) $ano_diferencia--;
	        	if($ano_diferencia<17) $data[0] += 1;
	        	if($ano_diferencia>17 && $ano_diferencia<=25) $data[1] += 1;
	        	if($ano_diferencia>25 && $ano_diferencia<=30) $data[2] += 1;
	        	if($ano_diferencia>30 && $ano_diferencia<=35) $data[3] += 1;
	        	if($ano_diferencia>35 && $ano_diferencia<=40) $data[4] += 1;
	        	if($ano_diferencia>40 && $ano_diferencia<=45) $data[5] += 1;
	        	if($ano_diferencia>45 && $ano_diferencia<=50) $data[6] += 1;
	        	if($ano_diferencia>50 && $ano_diferencia<=55) $data[7] += 1;
	        	if($ano_diferencia>55 && $ano_diferencia<=60) $data[8] += 1;
	        	if($ano_diferencia>60 && $ano_diferencia<=70) $data[9] += 1;
	        	if($ano_diferencia>70) $data[10] += 1;

	        }

			$series = array(
			    array(
			        'name'  => 'Préstamos',
			        'type'  => 'line',
			        'color' => '#4572A7',
			        'data'  => $data,
			    ),
			);

			$ob = new Highchart();
			$ob->chart->renderTo('linechart'); // The #id of the div where to render the chart
			$ob->chart->type('linechart');
			$ob->title->text('Cantidad de Préstamos por Rango Etario '.$titulo);
			$ob->subtitle->text('Total: '.sizeof($prestamos).' préstamos');
			$ob->xAxis->categories($categories);
			$ob->legend->enabled(true);

			$ob->series($series);

			return $this->render('EstadisticaBundle:Default:grafico.html.twig', array(
		        'chart' => $ob
		    ));
		}
		return $this->render('EstadisticaBundle:Default:index.html.twig');
	}


	public function fechaAction(Request $request)
	{
		$MesI = $request->get('MesI');
		$MesT = $request->get('MesT');
		if ($MesI){
			$monthI = substr($MesI, -2);
			$monthT = substr($MesT, -2);
			$meses = array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			if ($MesI == $MesT) {
				$titulo = "en el Mes de ".$meses[(int)$monthI]." de ".substr($MesI, 0,4);
			}
			else{
				$titulo = "entre los Meses de ".$meses[(int)$monthI]." y ".$meses[(int)$monthT];
			}
			$em = $this->getDoctrine()->getManager();
			$qb = $em->createQueryBuilder();
			$date_from = new \DateTime($MesI.'-01');
			$date_to = new \DateTime($MesT.'-31');
			$query = $qb->select('s')
	            ->from('Acme\PrestamoBundle\Entity\Prestamo', 's')
	            ->where('s.fechaPrestamo >= :date_from')
	            ->andWhere('s.fechaPrestamo <= :date_to')
	            ->setParameter('date_from', $date_from, \Doctrine\DBAL\Types\Type::DATETIME)
	            ->setParameter('date_to', $date_to, \Doctrine\DBAL\Types\Type::DATETIME)
	            //->andWhere($qb->expr()->between('s.date', ':date_from', ':date_to'));
	            ->getQuery();
			echo ' ';
	        $prestamos = $query->getResult();
	        
	        $j=0;
	        $flag = false;
	        for ($i = 0; $i<sizeof($prestamos);$i++){
	        	$fecha = $prestamos[$i]->getFechaPrestamo();
	        	$dia = (substr($fecha, 8, 2));
	        	if(isset(${'dia'.$dia})){
	        		${'dia'.$dia} += 1;
	        	} else{
	        		${'dia'.$dia} = 1;
	        		$categories[$j]= (substr($fecha, 8, 2));
	        		$j += 1;
	        	}

	        }
	        sort($categories);
	        for ($i = 0; $i<sizeof($categories);$i++){
	        	$data[$i] = ${'dia'.$categories[$i]};
	        }

			$series = array(
			    array(
			        'name'  => 'Préstamos',
			        'type'  => 'column',
			        'color' => '#4572A7',
			        'data'  => $data,
			    ),
			);

			$ob = new Highchart();
			$ob->chart->renderTo('linechart'); // The #id of the div where to render the chart
			$ob->chart->type('column');
			$ob->title->text('Cantidad de Préstamos por Día '.$titulo);
			$ob->subtitle->text('Total: '.sizeof($prestamos).' préstamos');
			$ob->xAxis->categories($categories);
			$ob->legend->enabled(true);

			$ob->series($series);

			return $this->render('EstadisticaBundle:Default:grafico.html.twig', array(
		        'chart' => $ob
		    ));
		}
		return $this->render('EstadisticaBundle:Default:index.html.twig');
	}
}
