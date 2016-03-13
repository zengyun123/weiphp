<?php
        	
namespace Addons\DayQuestion\Model;
use Home\Model\WeixinModel;
        	
/**
 * DayQuestion的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'DayQuestion' ); // 获取后台插件的配置参数	
                $now_date=  strtotime(date('Y-m-d',time()));
                $question_info=M('dayquestion')->where('date="'.$now_date.'"')->find();
                $param['openid']=  get_openid();
                $param['token']=  get_token();
                $user_follow=M('public_follow')->where($param)->find();                
                $dayquestion_cache_info=M('dayquestion_cache')->where('uid="'.$user_follow['uid'].'"')->order('time DESC')->find();                
                $user_info_all=getUserInfo($user_follow['uid']);
                $count='DayQuestion';
                $question_time=strtotime(date('Y-m-d',$dayquestion_cache_info['time']));
                
                if($question_time==$now_date){
                    $this->replyText('你已经回答完毕');
                }else{
                    
                    if ($dataArr ['Content'] == $count) {			// 设置用户状态
                        unset($count);
                        $keyword_info=$question_info['date'];
			$keywordArr ['step'] = $keyword_info;                        
			set_user_status ( 'DayQuestion', $keywordArr );
                        if(empty($question_info)){
                            $this->replyText('系统繁忙请稍后再试');
                        }else{
                        $arrnew[0]=array(
                            'Title'=>'每日一题 - 看图猜成语',
                            'PicUrl'=>get_cover_url($question_info['question']),
                            'Description'=>'请猜一个四字成语'."\n".'(回复正确答案即可)'."\n".'注意：图片加载速度与网速有关！！'
                            );
                            $this->replyNews($arrnew);
                        return true;
			}
                    }
                    if (isset ( $keywordArr ['step'] )) {
                        $newid=$keywordArr['step'];
                        $extendinfo=M('dayquestion')->where('date="'.$newid.'"')->find();                       
                        $myaww=strtoupper($dataArr['Content']);	
                        $myaw= str_replace(' ','',$myaww);
                        $exp=M('user')->where('uid="'.$user_follow['uid'].'"')->find();                      
                    if($myaw==$extendinfo['answer']){
			$data=array(
			'uid'=>$user_follow['uid'],
                        'answer'=>'99',
			'time'=>time(),
			'token'=>$param['token']
			);
                        $newexp['score']=$exp['score']+5;
                        $addexp=M('user')->where('uid="'.$user_follow['uid'].'"')->save($newexp);
			$add=M('dayquestion_cache')->data($data)->add();
                        $this->replyText('回答正确!'."\n".'+5点积分'."\n".'----------'."\n".'积分可用于:'."\n".'商品兑换及每日抽奖');
                        exit();
                    }else{                    
			$data=array(
                            'uid'=>$user_follow['uid'],
                            'answer'=>'0',
                            'time'=>time(),
							'token'=>$param['token']
			);                                       
			$add=M('dayquestion_cache')->data($data)->add();
                        $this->replyText('回答错误!'."\n".'正确答案是：'.$extendinfo['answer'].'!');
                        exit();
                    }
                }
                        
                    
                }
                
	}
}
        	