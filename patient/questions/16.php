<div class="mb-8">
    <label for="q-16">Q.No. 8- During the past month how much of a problem has it been for you to keep up enthusiasm to get things done?</label>
    <input type="hidden" name="question" value="8"/>
    <select id="q-16" name="answer" class="form-input">
        <option value="">-- Select --</option>
        <option value="1" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='1'?"selected":""?>>1</option>
        <option value="2" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='2'?"selected":""?>>2</option>
        <option value="3" <?=isset($oldAnswer['answer']) && $oldAnswer['answer']=='3'?"selected":""?>>3</option>
    </select>
    <?php if(isset($errors['q-16'])){?><label class="text-danger"><?=$errors['q-16'][0]?></label><?php } ?>
</div>