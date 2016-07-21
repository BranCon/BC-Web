<p />
<div class="col-lg-12">
    
    <?php

    $events = array();
    //Testing
    $Event = new \yii2fullcalendar\models\Event();
    $Event->id = 1;
    $Event->title = 'Testing';
    $Event->start = date('Y-m-d\TH:i:s\Z');
    $events[] = $Event;

    $Event = new \yii2fullcalendar\models\Event();
    $Event->id = 2;
    $Event->title = 'Testing';
    $Event->url = "https://www.facebook.com/turnvereinweyer/?fref=ts";
    $Event->start = date('Y-m-d\TH:i:s\Z',strtotime('tomorrow 6am'));
    $events[] = $Event;
    
    $Event = new \yii2fullcalendar\models\Event();
    $Event->id = 3;
    $Event->title = 'Turnen';
    $Event->color = 'red';
    $Event->url = '';
    $Event->start = date('2016-07-19 19:00');
    $events[] = $Event;

    ?>

    <?= 
    
        \yii2fullcalendar\yii2fullcalendar::widget([
                'clientOptions' => [
                    'eventClick' => new \yii\web\JsExpression("
                        function(calEvent, jsEvent, view) {
                            //alert(calEvent.title + ' ' + calEvent.url);
                            $('#myModal').modal();
                            
                                // Titel für Modal
                                    $('#modal-title').html( calEvent.title );
                                // content für Modal
                                    var modalBody = '<p>Beginn: ' + calEvent.start + '<br />Ende: ' + calEvent.end + '</p>'; 
                                    $('#modal-body').html( modalBody );
                                    

                            //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                            //alert('View: ' + view.name);
                            // change the border color just for fun
                            //$(this).css('border-color', 'red');
                        }
                    "),
                    'id' => 'BCfullCal', 
                    'editable' => true,
                    /*
                       'startEditable' => true,
                       'durationEditable' => true,
                    */
                    'lang' => 'de',
                    'defaultView' => 'agendaWeek',
                    'firstDay' => 1, 
                    'title' => 'Kalender',
                    'weekNumbers' => true,
                    'weekends' => true,
                    'contentHeight' => 500,
                    
                    'businessHours' => [
                        'start' => '08:00',
                        'end' => '19:00',
                    ],
                    'customButtons' => [
                        'myCustomButton' => [
                            'text' => 'custom'
                        ]
                    ],
                ],
                //'ajaxEvents' => Url::to(['/core/event/event/jsoncalendar', 'searchUserlist' => $list2])
                'events'=> $events,
                
              ]);
    
    ?>
    
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 id="modal-title"></h4>
          </div>
          <div id="modal-body" class="container">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
</div>