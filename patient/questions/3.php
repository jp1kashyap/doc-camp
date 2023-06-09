<div class="mb-8" x-data="form">
    <label for="q-3">Q3) When have you usually gotten up in the morning?</label>
    <input type="hidden" name="question" value="3"/>
    <input type="hidden" name="score" value="<?=isset($oldAnswer['score'])?$oldAnswer['score']:"1"?>"/>
    <input id="q-3" name="answer" x-model="date3" type="text"  placeholder="Select Time " value="" class="form-input" />
    <?php if(isset($errors['q-3'])){?><label class="text-danger"><?=$errors['q-3'][0]?></label><?php } ?>
</div>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("form", () => ({
            date3: '<?=isset($oldAnswer['answer'])?$oldAnswer['answer']:"12:00"?>',
            init() {
                flatpickr(document.getElementById('q-3'), {
                    defaultDate: this.date3,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
            }
        }));
    });
</script>