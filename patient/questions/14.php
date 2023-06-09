<div class="mb-8">
    <label for="q-14">Q6) During the past month how often have you taken medicine (prescribed or “over the counter”) to help you sleep?</label>
    <input type="hidden" name="question" value="6"/>
    <input type="hidden" name="score" value="<?=isset($oldAnswer['score'])?$oldAnswer['score']:"1"?>"/>
    <select id="q-14" name="answer" class="form-input" onchange="getScore(this)">
        <option value="">-- Select --</option>
        <option value="Not during the past month" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='Not during the past month'?"selected":""?>>Not during the past month</option>
        <option value="Less then once a week" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='Less then once a week'?"selected":""?>>Less then once a week</option>
        <option value="Once or twice a week" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='Once or twice a week'?"selected":""?>>Once or twice a week</option>
        <option value="Three or more times week" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='Three or more times week'?"selected":""?>>Three or more times week</option>
    </select>
    <?php if(isset($errors['q-14'])){?><label class="text-danger"><?=$errors['q-14'][0]?></label><?php } ?>
</div>
<script>
    var scores=[];
    scores['Not during the past month']='0';
    scores['Less then once a week']='1';
    scores['Once or twice a week']='2';
    scores['Three or more times week']='3';
    function getScore(selectObject) {
        var answer = selectObject.value; 
        if(answer){
            document.getElementsByName('score')[0].value=scores[answer];
        }else{
            document.getElementsByName('score')[0].value='';
        }
    }
</script>