<?php
$content= "<div id='page-container'><navbox id='tables_links'>";
foreach ($tables as $value) {
  $content.="<a href='admin/données/".$value."'>".$value."</a>";
}
$content.="</navbox>";

if (isset($table)) {
  $thead="<thead><tr id='table-keys'>";
  foreach ($table_columns as $column) {
    $thead.="<th>".ucwords($column)."</th>";
  }
  $thead.="<th>Action</th>";
  $thead.="</tr></thead>";
  $tbody="<tbody>";
  foreach ($table_values as $line) {
    $tbody.="<tr>";
    foreach ($line as $value) {
      $tbody.="<td>".$value."</td>";
    }
    $tbody.=<<<EOD
      <td>
        <div class='table-buttons'>
  				<i class="fas fa-edit table-button edit-table-row"></i>
  				<i class="fas fa-trash-alt table-button delete-table-row"></i>
  			</div>
      </td>
EOD;
    $tbody.="</tr>";
  }
  $tbody.="</tbody>";
  $content.= <<<EOD
  <div id="table">
    <table>
      $thead
      $tbody
    </table>
  </div>
EOD;
$content.=<<<EOD
    <div id='edit-form'>
      <form class='form'>
        <h1>Editer</h1>
        <div class='form-inputs'>
        </div>
        <input type="submit" class="form-button form-confirm" value="Valider">
        <input type="button" class="form-button form-cancel" value="Annuler">
      </form>
    </div>
    <div id='delete-form'>
      <form class='form'>
        <h1>Supprimer</h1>
        <div class='form-inputs'></div>
        <input type="submit" class="form-button form-confirm" value="Valider">
        <input type="button" class="form-button form-cancel" value="Annuler">
      </form>
    </div>
    <div id="new-row">Nouveau</div>
EOD;
}
$content.="</div>";
?>
