<div class="mb-8">
    <label for="q-2">Q2) How long (in minutes) has it taken you to fall asleep each night?</label>
    <input type="hidden" name="question" value="2"/>
    <input type="hidden" name="score" value="<?=isset($oldAnswer['score'])?$oldAnswer['score']:"1"?>"/>
    <select id="q-2" name="answer" class="form-input" onchange="getScore(this)">
        <option value="">-- Select --</option>
        <option value="00:15" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='00:15'?"selected":""?>>00:15</option>
        <option value="00:30" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='00:30'?"selected":""?>>00:30</option>
        <option value="00:45" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='00:45'?"selected":""?>>00:45</option>
        <option value="01:00" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='01:00'?"selected":""?>>01:00</option>
        <option value="01:15" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='01:15'?"selected":""?>>01:15</option>
        <option value="01:30" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='01:30'?"selected":""?>>01:30</option>
        <option value="01:45" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='01:45'?"selected":""?>>01:45</option>
        <option value="02:00" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='02:00'?"selected":""?>>02:00</option>
        <option value="02:15" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='02:15'?"selected":""?>>02:15</option>
        <option value="02:30" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='02:30'?"selected":""?>>02:30</option>
    </select>
    <?php if(isset($errors['q-2'])){?><label class="text-danger"><?=$errors['q-2'][0]?></label><?php } ?>
</div>
<script>
    function getScore(selectObject) {
        var answer = selectObject.value; 
        if(answer=='00:15'){
            document.getElementsByName('score')[0].value='0';
        }else if(answer=='00:30'){
            document.getElementsByName('score')[0].value='1';
        }else if(answer=='00:45' || answer=='00:60'){
            document.getElementsByName('score')[0].value='2';
        }else if(!answer){
            document.getElementsByName('score')[0].value='';
        }else{
            document.getElementsByName('score')[0].value='3';
        }
    }
</script>