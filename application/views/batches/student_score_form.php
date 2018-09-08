<div class="card-body">
    <h5 class="card-title"><?php echo $student_info['last_name'].', '.$student_info['first_name']; ?></h5>
    <hr/>
    <form id="student_behavioural_score_form" method="post" role="form"  data-action="<?php echo site_url('Batches/save_student_behavioural_score') ?>"
        enctype="multipart/form-data">
        <input type="hidden" name="student_id" id="student_id" value="<?php echo isset($behaviour_score->student_id)?$behaviour_score->student_id:$s_id; ?>">
      <input type="hidden" name="grade_scale_id" id="grade_scale_id" value="2">
      <input type="hidden" name="term_id" id="term_id" value="<?php echo isset($behaviour_score->term_id)?$behaviour_score->term_id:$term_id; ?>">
      <div class="form-group row" style="background-color: lightgrey;">
          <label for="inputEmail3" class="col-sm-6 col-form-label">Affective Domain</label>
          <label for="inputEmail3" class="col-sm-6 col-form-label">Grade</label>
      </div>
      <div class="form-group row" style="background-color: #f9f9f9;">
          <label for="punctuality" class="col-sm-6 col-form-label">Punctuality</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="punctuality" id="punctuality">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->punctuality)&&($behaviour_score->punctuality==$scale['id'])?'selected':""; ?>>
                          <?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="assignments" class="col-sm-6 col-form-label">Assignments</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="assignments" id="assignments">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->assignments)&&($behaviour_score->assignments==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row" style="background-color: #f9f9f9;">
          <label for="participation" class="col-sm-6 col-form-label">Participation in Class</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="participation" id="participation">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->participation)&&($behaviour_score->participation==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="relationship" class="col-sm-6 col-form-label">Relationship with Others</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="relationship" id="relationship">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->relationship)&&($behaviour_score->relationship==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row" style="background-color: #f9f9f9;">
          <label for="neatness" class="col-sm-6 col-form-label">Neatness</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="neatness" id="neatness">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->neatness)&&($behaviour_score->neatness==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="sense_of_responsibility" class="col-sm-6 col-form-label">Sense of Responsibility</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="sense_of_responsibility" id="sense_of_responsibility">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->sense_of_responsibility)&&($behaviour_score->sense_of_responsibility==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row" style="background-color: #f9f9f9;">
          <label for="religious_activities" class="col-sm-6 col-form-label">Religious Activities</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="religious_activities" id="religious_activities">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->religious_activities)&&($behaviour_score->religious_activities==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="self_control" class="col-sm-6 col-form-label">Self Control</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="self_control" id="self_control">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->self_control)&&($behaviour_score->self_control==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row" style="background-color: #f9f9f9;">
          <label for="obedience" class="col-sm-6 col-form-label">Obedience</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="obedience" id="obedience">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->obedience)&&($behaviour_score->obedience==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="participation_in_social_activities" class="col-sm-6 col-form-label">Participation in Social Activities</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="participation_in_social_activities" id="participation_in_social_activities">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->participation_in_social_activities)&&($behaviour_score->participation_in_social_activities==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row" style="background-color: #f9f9f9;">
          <label for="honesty" class="col-sm-6 col-form-label">Honesty</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="honesty" id="honesty">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->honesty)&&($behaviour_score->honesty==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="politeness" class="col-sm-6 col-form-label">Politeness</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="politeness" id="politeness">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->politeness)&&($behaviour_score->politeness==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row" style="background-color: #f9f9f9;">
          <label for="attentiveness" class="col-sm-6 col-form-label">Attentiveness</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="attentiveness" id="attentiveness">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->attentiveness)&&($behaviour_score->attentiveness==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="community_spirit" class="col-sm-6 col-form-label">Community Spirit</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="community_spirit" id="community_spirit">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->community_spirit)&&($behaviour_score->community_spirit==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row" style="background-color: #f9f9f9;">
          <label for="initiative" class="col-sm-6 col-form-label">Initiative</label>
          <div class="col-sm-6">
              <select class="custom-select mr-sm-2" name="initiative" id="initiative">
                  <option value="">Please Select</option>
                  <?php foreach($scales as $scale): ?>
                      <option value="<?php echo $scale['id']; ?>"<?php echo isset($behaviour_score->initiative)&&($behaviour_score->initiative==$scale['id'])?'selected':""; ?>><?php echo $scale['name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <div class="col-sm-10" style="text-align: center">
              <button type="submit" id="save_student_grade" class="btn btn-primary"><i class="fa fa-floppy-o"></i>Save</button>
          </div>
      </div>
    </form>
</div>