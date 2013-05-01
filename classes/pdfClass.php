<?php
require('fpdf.php');
class PDF extends FPDF
{
//Load data
var $B;
var $I;
var $U;
var $HREF;
var $tablewidths;
var $headerset;
var $footerset;
var $legends;
var $wLegend;
var $sum;
var $NbVal;

function LoadData($file)
{
    //Read file lines
    $lines=file($file);
    $data=array();
    foreach($lines as $line)
        $data[]=explode(';',chop($line));
    return $data;
}
function Header()
{
    //Logo
    $this->Image('../resources/pdf/header.jpg');
    $this->Ln(20);
}

//Simple table
function BasicTable($header,$data)
{
    //Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    //Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

//Better table
function ImprovedTable($header,$data)
{
    //Column widths
    $w=array(40,35,40,45);
    //Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    //Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    //Closure line
    $this->Cell(array_sum($w),0,'','T');
}

//Colored table
function FancyTable($header,$data)
{
    //Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    //Header
    $w=array(40,35,40,45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    //Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Data
    $fill=false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
		$this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}
function WriteHTML($html)
{
    //HTML parser
    $html=str_replace("\n",' ',$html);
    $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            //Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            //Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                //Extract attributes
                $a2=explode(' ',$e);
                $tag=strtoupper(array_shift($a2));
                $attr=array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])]=$a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag,$attr)
{
    //Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF=$attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    //Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF='';
}

function SetStyle($tag,$enable)
{
    //Modify style and select corresponding font
    $this->$tag+=($enable ? 1 : -1);
    $style='';
    foreach(array('B','I','U') as $s)
    {
        if($this->$s>0)
            $style.=$s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL,$txt)
{
    //Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
function _beginpage($orientation, $format) {
    $this->page++;
    if(!$this->pages[$this->page]) // solves the problem of overwriting a page if it already exists
        $this->pages[$this->page]='';
    $this->state=2;
    $this->x=$this->lMargin;
    $this->y=$this->tMargin;
    $this->FontFamily='';
    //Check page size
    if($orientation=='')
        $orientation=$this->DefOrientation;
    else
        $orientation=strtoupper($orientation[0]);
    if($format=='')
        $format=$this->DefPageFormat;
    else
    {
        if(is_string($format))
            $format=$this->_getpageformat($format);
    }
    if($orientation!=$this->CurOrientation || $format[0]!=$this->CurPageFormat[0] || $format[1]!=$this->CurPageFormat[1])
    {
        //New size
        if($orientation=='P')
        {
            $this->w=$format[0];
            $this->h=$format[1];
        }
        else
        {
            $this->w=$format[1];
            $this->h=$format[0];
        }
        $this->wPt=$this->w*$this->k;
        $this->hPt=$this->h*$this->k;
        $this->PageBreakTrigger=$this->h-$this->bMargin;
        $this->CurOrientation=$orientation;
        $this->CurPageFormat=$format;
    }
    if($orientation!=$this->DefOrientation || $format[0]!=$this->DefPageFormat[0] || $format[1]!=$this->DefPageFormat[1])
        $this->PageSizes[$this->page]=array($this->wPt, $this->hPt);
}


function morepagestable($lineheight=8) {
    // some things to set and 'remember'
    $l = $this->lMargin;
    $startheight = $h = $this->GetY();
    $startpage = $currpage = $this->page;

    // calculate the whole width
    foreach($this->tablewidths as $width) {
        $fullwidth += $width;
    }

    // Now let's start to write the table
    $row = 0;
    while($data=mysql_fetch_row($this->results)) {
        $this->page = $currpage;
        // write the horizontal borders
        $this->Line($l,$h,$fullwidth+$l,$h);
        // write the content and remember the height of the highest col
        foreach($data as $col => $txt) {

            $this->page = $currpage;
            $this->SetXY($l,$h);
            $this->MultiCell($this->tablewidths[$col],$lineheight,$txt,0,$this->colAlign[$col]);

            $l += $this->tablewidths[$col];

            if($tmpheight[$row.'-'.$this->page] < $this->GetY()) {
                $tmpheight[$row.'-'.$this->page] = $this->GetY();
            }
            if($this->page > $maxpage)
                $maxpage = $this->page;
            unset($data[$col]);
        }
        // get the height we were in the last used page
        $h = $tmpheight[$row.'-'.$maxpage];
        // set the "pointer" to the left margin
        $l = $this->lMargin;
        // set the $currpage to the last page
        $currpage = $maxpage;
        unset($data[$row]);
        $row++ ;
    }
    // draw the borders
    // we start adding a horizontal line on the last page
    $this->page = $maxpage;
    $this->Line($l,$h,$fullwidth+$l,$h);
    // now we start at the top of the document and walk down
    for($i = $startpage; $i <= $maxpage; $i++) {
        $this->page = $i;
        $l = $this->lMargin;
        $t = ($i == $startpage) ? $startheight : $this->tMargin;
        $lh = ($i == $maxpage) ? $h : $this->h-$this->bMargin;
        $this->Line($l,$t,$l,$lh);
        foreach($this->tablewidths as $width) {
            $l += $width;
            $this->Line($l,$t,$l,$lh);
        }
    }
    // set it to the last page, if not it'll cause some problems
    $this->page = $maxpage;
}

function connect($host='localhost',$username='',$password='',$db=''){
    $this->conn = mysql_connect($host,$username,$password) or die( mysql_error() );
    mysql_select_db($db,$this->conn) or die( mysql_error() );
    return true;
}

function query($query){
    $this->results = mysql_query($query,$this->conn);
    $this->numFields = mysql_num_fields($this->results);
}

function mysql_report($query,$dump=false,$attr=array()){

    foreach($attr as $key=>$val){
        $this->$key = $val ;
    }

    $this->query($query);

    // if column widths not set
    if(!isset($this->tablewidths)){

        // starting col width
        $this->sColWidth = (($this->w-$this->lMargin-$this->rMargin))/$this->numFields;

        // loop through results header and set initial col widths/ titles/ alignment
        // if a col title is less than the starting col width / reduce that column size
        for($i=0;$i<$this->numFields;$i++){
            $stringWidth = $this->getstringwidth(mysql_field_name($this->results,$i)) + 6 ;
            if( ($stringWidth) < $this->sColWidth){
                $colFits[$i] = $stringWidth ;
                // set any column titles less than the start width to the column title width
            }
            $this->colTitles[$i] = mysql_field_name($this->results,$i) ;
            switch (mysql_field_type($this->results,$i)){
                case 'int':
                    $this->colAlign[$i] = 'R';
                    break;
                default:
                    $this->colAlign[$i] = 'L';
            }
        }

        // loop through the data, any column whose contents is bigger that the col size is
        // resized
        while($row=mysql_fetch_row($this->results)){
            foreach($colFits as $key=>$val){
                $stringWidth = $this->getstringwidth($row[$key]) + 6 ;
                if( ($stringWidth) > $this->sColWidth ){
                    // any col where row is bigger than the start width is now discarded
                    unset($colFits[$key]);
                }else{
                    // if text is not bigger than the current column width setting enlarge the column
                    if( ($stringWidth) > $val ){
                        $colFits[$key] = ($stringWidth) ;
                    }
                }
            }
        }

        foreach($colFits as $key=>$val){
            // set fitted columns to smallest size
            $this->tablewidths[$key] = $val;
            // to work out how much (if any) space has been freed up
            $totAlreadyFitted += $val;
        }

        $surplus = (sizeof($colFits)*$this->sColWidth) - ($totAlreadyFitted);
        for($i=0;$i<$this->numFields;$i++){
            if(!in_array($i,array_keys($colFits))){
                $this->tablewidths[$i] = $this->sColWidth + ($surplus/(($this->numFields)-sizeof($colFits)));
            }
        }

        ksort($this->tablewidths);

        if($dump){
            Header('Content-type: text/plain');
            for($i=0;$i<$this->numFields;$i++){
                if(strlen(mysql_field_name($this->results,$i))>$flength){
                    $flength = strlen(mysql_field_name($this->results,$i));
                }
            }
            switch($this->k){
                case 72/25.4:
                    $unit = 'millimeters';
                    break;
                case 72/2.54:
                    $unit = 'centimeters';
                    break;
                case 72:
                    $unit = 'inches';
                    break;
                default:
                    $unit = 'points';
            }
            print "All measurements in $unit\n\n";
            for($i=0;$i<$this->numFields;$i++){
                printf("%-{$flength}s : %-10s : %10f\n",
                    mysql_field_name($this->results,$i),
                    mysql_field_type($this->results,$i),
                    $this->tablewidths[$i] );
            }
            print "\n\n";
            print "\$pdf->tablewidths=\n\tarray(\n\t\t";
            for($i=0;$i<$this->numFields;$i++){
                ($i<($this->numFields-1)) ?
                print $this->tablewidths[$i].", /* ".mysql_field_name($this->results,$i)." */\n\t\t":
                print $this->tablewidths[$i]." /* ".mysql_field_name($this->results,$i)." */\n\t\t";
            }
            print "\n\t);\n";
            exit;
        }

    } else { // end of if tablewidths not defined

        for($i=0;$i<$this->numFields;$i++){
            $this->colTitles[$i] = mysql_field_name($this->results,$i) ;
            switch (mysql_field_type($this->results,$i)){
                case 'int':
                    $this->colAlign[$i] = 'R';
                    break;
                default:
                    $this->colAlign[$i] = 'L';
            }
        }
    }

    mysql_data_seek($this->results,0);
    $this->AliasNbPages();
    $this->SetY($this->tMargin);
    $this->AddPage();
    $this->morepagestable($this->FontSizePt);
    }
	function PieChart($w, $h, $data, $format, $colors=null)
    {
        $this->SetFont('Courier', '', 10);
        $this->SetLegends($data,$format);

        $XPage = $this->GetX();
        $YPage = $this->GetY();
        $margin = 2;
        $hLegend = 5;
        $radius = min($w - $margin * 4 - $hLegend - $this->wLegend, $h - $margin * 2);
        $radius = floor($radius / 2);
        $XDiag = $XPage + $margin + $radius;
        $YDiag = $YPage + $margin + $radius;
        if($colors == null) {
            for($i = 0; $i < $this->NbVal; $i++) {
                $gray = $i * intval(255 / $this->NbVal);
                $colors[$i] = array($gray,$gray,$gray);
            }
        }

        //Sectors
        $this->SetLineWidth(0.2);
        $angleStart = 0;
        $angleEnd = 0;
        $i = 0;
        foreach($data as $val) {
            $angle = ($val * 360) / doubleval($this->sum);
            if ($angle != 0) {
                $angleEnd = $angleStart + $angle;
                $this->SetFillColor($colors[$i][0],$colors[$i][1],$colors[$i][2]);
                $this->Sector($XDiag, $YDiag, $radius, $angleStart, $angleEnd);
                $angleStart += $angle;
            }
            $i++;
        }

        //Legends
        $this->SetFont('Courier', '', 10);
        $x1 = $XPage + 2 * $radius + 4 * $margin;
        $x2 = $x1 + $hLegend + $margin;
        $y1 = $YDiag - $radius + (2 * $radius - $this->NbVal*($hLegend + $margin)) / 2;
        for($i=0; $i<$this->NbVal; $i++) {
            $this->SetFillColor($colors[$i][0],$colors[$i][1],$colors[$i][2]);
            $this->Rect($x1, $y1, $hLegend, $hLegend, 'DF');
            $this->SetXY($x2,$y1);
            $this->Cell(0,$hLegend,$this->legends[$i]);
            $y1+=$hLegend + $margin;
        }
    }

    function BarDiagram($w, $h, $data, $format, $color=null, $maxVal=0, $nbDiv=4)
    {
        $this->SetFont('Courier', '', 10);
        $this->SetLegends($data,$format);

        $XPage = $this->GetX();
        $YPage = $this->GetY();
        $margin = 2;
        $YDiag = $YPage + $margin;
        $hDiag = floor($h - $margin * 2);
        $XDiag = $XPage + $margin * 2 + $this->wLegend;
        $lDiag = floor($w - $margin * 3 - $this->wLegend);
        if($color == null)
            $color=array(155,155,155);
        if ($maxVal == 0) {
            $maxVal = max($data);
        }
        $valIndRepere = ceil($maxVal / $nbDiv);
        $maxVal = $valIndRepere * $nbDiv;
        $lRepere = floor($lDiag / $nbDiv);
        $lDiag = $lRepere * $nbDiv;
        $unit = $lDiag / $maxVal;
        $hBar = floor($hDiag / ($this->NbVal + 1));
        $hDiag = $hBar * ($this->NbVal + 1);
        $eBaton = floor($hBar * 80 / 100);

        $this->SetLineWidth(0.2);
        $this->Rect($XDiag, $YDiag, $lDiag, $hDiag);

        $this->SetFont('Courier', '', 10);
        $this->SetFillColor($color[0],$color[1],$color[2]);
        $i=0;
        foreach($data as $val) {
            //Bar
            $xval = $XDiag;
            $lval = (int)($val * $unit);
            $yval = $YDiag + ($i + 1) * $hBar - $eBaton / 2;
            $hval = $eBaton;
            $this->Rect($xval, $yval, $lval, $hval, 'DF');
            //Legend
            $this->SetXY(0, $yval);
            $this->Cell($xval - $margin, $hval, $this->legends[$i],0,0,'R');
            $i++;
        }

        //Scales
        for ($i = 0; $i <= $nbDiv; $i++) {
            $xpos = $XDiag + $lRepere * $i;
            $this->Line($xpos, $YDiag, $xpos, $YDiag + $hDiag);
            $val = $i * $valIndRepere;
            $xpos = $XDiag + $lRepere * $i - $this->GetStringWidth($val) / 2;
            $ypos = $YDiag + $hDiag - $margin;
            $this->Text($xpos, $ypos, $val);
        }
    }

    function SetLegends($data, $format)
    {
        $this->legends=array();
        $this->wLegend=0;
        $this->sum=array_sum($data);
        $this->NbVal=count($data);
        foreach($data as $l=>$val)
        {
            $p=sprintf('%.2f',$val/$this->sum*100).'%';
            $legend=str_replace(array('%l','%v','%p'),array($l,$val,$p),$format);
            $this->legends[]=$legend;
            $this->wLegend=max($this->GetStringWidth($legend),$this->wLegend);
        }
    }
	function Sector($xc, $yc, $r, $a, $b, $style='FD', $cw=true, $o=90)
    {
        $d0 = $a - $b;
        if($cw){
            $d = $b;
            $b = $o - $a;
            $a = $o - $d;
        }else{
            $b += $o;
            $a += $o;
        }
        while($a<0)
            $a += 360;
        while($a>360)
            $a -= 360;
        while($b<0)
            $b += 360;
        while($b>360)
            $b -= 360;
        if ($a > $b)
            $b += 360;
        $b = $b/360*2*M_PI;
        $a = $a/360*2*M_PI;
        $d = $b - $a;
        if ($d == 0 && $d0 != 0)
            $d = 2*M_PI;
        $k = $this->k;
        $hp = $this->h;
        if (sin($d/2))
            $MyArc = 4/3*(1-cos($d/2))/sin($d/2)*$r;
        else
            $MyArc = 0;
        //first put the center
        $this->_out(sprintf('%.2F %.2F m',($xc)*$k,($hp-$yc)*$k));
        //put the first point
        $this->_out(sprintf('%.2F %.2F l',($xc+$r*cos($a))*$k,(($hp-($yc-$r*sin($a)))*$k)));
        //draw the arc
        if ($d < M_PI/2){
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
        }else{
            $b = $a + $d/4;
            $MyArc = 4/3*(1-cos($d/8))/sin($d/8)*$r;
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
            $a = $b;
            $b = $a + $d/4;
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
            $a = $b;
            $b = $a + $d/4;
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
            $a = $b;
            $b = $a + $d/4;
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
        }
        //terminate drawing
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='b';
        else
            $op='s';
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3 )
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c',
            $x1*$this->k,
            ($h-$y1)*$this->k,
            $x2*$this->k,
            ($h-$y2)*$this->k,
            $x3*$this->k,
            ($h-$y3)*$this->k));
    }



}
?>