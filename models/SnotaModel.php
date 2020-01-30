<?php 
class SnotaModel extends Model {
	public function set( $nota_data = array() ) {
		foreach ($nota_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO notas_estudiante (notaestu_id, documento_estu, año, corte, logro, nota) VALUES ($nota_id, '$documento', '$year', $corte, $logro, $nota)";
		$this->set_query();
	}

	public function get( $nota_id = '') {
		$this->query = ($nota_id != '')
			?"SELECT * FROM (notas_estudiante as nte 
			LEFT JOIN corte as ct
			ON nte.corte = ct.corte_id) 
			LEFT JOIN funcionario as fn
			ON nte.documento_estu = fn.documento
			LEFT JOIN logro as lg
			ON nte.logro = lg.id_logro 
			LEFT JOIN nota as nt
			ON nte.nota = nt.nota_id WHERE notaestu_id = $nota_id"
			:"SELECT * FROM (notas_estudiante as nte 
			LEFT JOIN corte as ct
			ON nte.corte = ct.corte_id) 
			LEFT JOIN funcionario as fn
			ON nte.documento_estu = fn.documento
			LEFT JOIN prof_curso_asignatura as pca
			ON fn.documento = pca.documento_profe
			LEFT JOIN logro as lg
			ON nte.logro = lg.id_logro 
			LEFT JOIN nota as nt
			ON nte.nota = nt.nota_id";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function getdoc( $doc_id = '') {
		$this->query = ($doc_id != '')
			?"SELECT * FROM (notas_estudiante as nte 
			LEFT JOIN corte as ct
			ON nte.corte = ct.corte_id) 
			LEFT JOIN funcionario as fn
			ON nte.documento_estu = fn.documento
			LEFT JOIN logro as lg
			ON nte.logro = lg.id_logro 
			LEFT JOIN nota as nt
			ON nte.nota = nt.nota_id 
			WHERE nte.documento_estu = '$doc_id'"
			:"SELECT * FROM (notas_estudiante as nte 
			LEFT JOIN corte as ct
			ON nte.corte = ct.corte_id) 
			LEFT JOIN logro as lg
			ON nte.logro = lg.id_logro 
			LEFT JOIN nota as nt
			ON nte.nota = nt.nota_id";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}
	public function getcurso( $curso_id = '') {
		$this->query = ($curso_id != '')
			?"SELECT * FROM (notas_estudiante as nte 
			LEFT JOIN corte as ct
			ON nte.corte = ct.corte_id) 
			LEFT JOIN funcionario as fn
			ON nte.documento_estu = fn.documento
			LEFT JOIN logro as lg
			ON nte.logro = lg.id_logro 
			LEFT JOIN curso as cr
			ON lg.curso = cr.curso_id
			LEFT JOIN nota as nt
			ON nte.nota = nt.nota_id WHERE fn.curso = $curso_id"
			:"SELECT * FROM (notas_estudiante as nte 
			LEFT JOIN corte as ct
			ON nte.corte = ct.corte_id) 
			LEFT JOIN funcionario as fn
			ON nte.documento_estu = fn.documento
			LEFT JOIN prof_curso_asignatura as pca
			ON fn.documento = pca.documento_profe
			LEFT JOIN logro as lg
			ON nte.logro = lg.id_logro
			LEFT JOIN curso as cr
			ON lg.curso = cr.curso_id 
			LEFT JOIN nota as nt
			ON nte.nota = nt.nota_id";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function getasig( $asig_id = '') {
		$this->query = ($asig_id != '')
			?"SELECT * FROM (notas_estudiante as nte 
			LEFT JOIN corte as ct
			ON nte.corte = ct.corte_id) 
			LEFT JOIN funcionario as fn
			ON nte.documento_estu = fn.documento
			LEFT JOIN logro as lg
			ON nte.logro = lg.id_logro 
			LEFT JOIN nota as nt
			ON nte.nota = nt.nota_id
			WHERE lg.asignatura = $asig_id"
			:"SELECT * FROM (notas_estudiante as nte 
			LEFT JOIN corte as ct
			ON nte.corte = ct.corte_id) 
			LEFT JOIN funcionario as fn
			ON nte.documento_estu = fn.documento
			LEFT JOIN logro as lg
			ON nte.logro = lg.id_logro 
			LEFT JOIN nota as nt
			ON nte.nota = nt.nota_id";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $nota_id = '' ) {
		$this->query = "DELETE FROM notas_estudiante WHERE notaestu_id = $nota_id";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}