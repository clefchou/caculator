 <?php
$tempnum1 = $_POST['trans_t1'];//�洢�Ӽ���������ʱֵ
$tempnum2 = $_POST['trans_t2'];//�洢�˳���������ʱֵ
$newnum = $_POST['trans_newnum'];//��־�Ƿ��´��������һ��������
$flag = $_POST['trans_flag'];//��־������ţ�1=>+ 2=>- 3=>* 4=>/)
$flag1= $_POST['trans_flag1']; //��־�ȼӼ��ٳ˳��ٽ��мӼ������(1��ʾA+BXC+D 2��ʾ1-BXC+D)
$data = array("t1" =>0,"t2"=>0,"result"=>0,"flag"=>0,"flag1"=>0,'newnum'=>0);
function equa($t1,$t2,$re,$n){ //equa����������flag��ֵ�������㷵�ؽ��
$ret;
switch($n){
case 1:
	$ret = $t1+$re;
	break;
case 2:
	$ret = $t1-$re;
	break;
case 3:
	$ret = $t2*$re;
	break;
case 4:
	$ret = $t2/$re;
	break;
default:
	break;
}
return $ret;
}     
$backValue=$_POST['trans_data'];//ǰ�˵�ǰ���µİ�ť��ֵ
$result=$_POST['trans_result'];//ǰ����ҳ�ϵ�ǰ��ʾ�Ľ��ֵ
switch($backValue){
case '+':
$newnum = 1;
	if($flag != 0){		//�ж�֮ǰ�Ƿ��������
		if($flag1 == 1){ //��ʱ�������A+BXC���ٴ�����+,��ʱ A��ֵ����tempnum1,����BXC������A�ٽ������ֵ�ٴ���tempnum1��
			$tempnum2 = equa($tempnum1,$tempnum2,$result,$flag);
			$tempnum1 = $tempnum1+$tempnum2;
			$tempnum2 = 0;
			$result = $tempnum1;
			$flag = 1;
			$flag1 = 0;	
			break;
		}
		if($flag1 == 2){
			$tempnum2 = equa($tempnum1,$tempnum2,$result,$flag);
			$tempnum1 = $tempnum1-$tempnum2;
			$tempnum2 = 0;
			$result = $tempnum1;
			$flag = 1;
			$flag1 = 0;	
			break;
		}
		$tempnum1 = equa($tempnum1,$tempnum2,$result,$flag);
		$result = $tempnum1;
		$flag = 1;	
		break;
		
	}
	else{
	$tempnum1 = $result;
	$flag = 1;
	}

	break;
case '-':
$newnum = 1;
	if($flag != 0){
		
		if($flag1 == 1){
			$tempnum2 = equa($tempnum1,$tempnum2,$result,$flag);
			$tempnum1 = $tempnum1+$tempnum2;
			$tempnum2 = 0;
			$result = $tempnum1;
			$flag = 2;
			$flag1 = 0;	
			break;
		}
		if($flag1 == 2){
			$tempnum2 = equa($tempnum1,$tempnum2,$result,$flag);
			$tempnum1 = $tempnum1-$tempnum2;
			$tempnum2 = 0;
			$result = $tempnum1;
			$flag = 2;
			$flag1 = 0;	
			break;
		}
		$tempnum1 = equa($tempnum1,$tempnum2,$result,$flag);
		$result = $tempnum1;
		$flag = 2;	
		break;
	}
	else{
	$tempnum1 = $result;
	$flag = 2;
	}

	break;
case '*':
$newnum = 1;
	if($flag == 1 || $flag == 2){
		$flag1 = $flag;
		$tempnum2 = $result;	
	}
	elseif($flag == 3 || $flag == 4){
		$tempnum2 = equa($tempnum1,$tempnum2,$result,$flag);
		$result = $tempnum2;
	}
	else
		$tempnum2 = $result;
	$flag = 3;
	break;
case '/':
$newnum = 1;
	if($flag == 1 || $flag == 2){
		$flag1 = $flag;
		$tempnum2 = $result;	
	}
	elseif($flag == 3 || $flag == 4){
		$tempnum2 = equa($tempnum1,$tempnum2,$result,$flag);
		$result = $tempnum2;
	}
	else
		$tempnum2 = $result;

	$flag = 4;
	break;
case '=':
		if($flag1 == 1){
			$tempnum2 = equa($tempnum1,$tempnum2,$result,$flag);
			$tempnum1 = $tempnum1+$tempnum2;
			$tempnum2 = 0;
			$result = $tempnum1;
			$flag1 = 0;	
			break;
		}
		if($flag1 == 2){
			$tempnum2 = equa($tempnum1,$tempnum2,$result,$flag);
			$tempnum1 = $tempnum1-$tempnum2;
			$tempnum2 = 0;
			$result = $tempnum1;
			$flag1 = 0;	
			break;
		}
		if($flag == 1 || $flag == 2){
			$tempnum1 = equa($tempnum1,$tempnum2,$result,$flag);
			$result = $tempnum1;
			}
	elseif($flag == 3 || $flag == 4){
			$tempnum2 = equa($tempnum1,$tempnum2,$result,$flag);
			$result = $tempnum2;
			}
	$flag = 0;
	break;
case 'CE':

	$tempnum1 = 0;
	$tempnum2 = 0;
	$result = 0;
	$flag = 0;
	$flag1 = 0;
	break;
default:
if($newnum == 0 )
	$result=$result*10+$backValue;
	else{
	$result=$backValue;
	$newnum = 0;
	}


break;
}
$json = array('t1' =>$tempnum1, 't2' =>$tempnum2, 'result' =>$result, 'flag' =>$flag, 'flag1' =>$flag1,'newnum'=>$newnum);
echo json_encode($json);
 ?>