<?php

class MangoPayEvents{
    // return all MangoPay events
    function getAllEvents(){
        //get Requests class
        $requests = new Requests();
        // return all events in JSON
        return $requests->do_get_request($requests->eventRequest);

    }

    // create table with all MangoPay events
    function diplayAllEvent(){
        // get all MangoPay events
        $events = $this->getAllEvents();
        // create table & header of the table
        $tab = "  
  <div class='container'>
        <div class='table-responsive'>  
            <table class='table'>
                <thead>
                    <tr>
                        <th>Event ID</th>
                        <th>Event Type</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
        ";
        // for each event, take the event id, event type and event date
        // then adding it to a td
        foreach($events as $event){
            $tab = $tab.
                "<tr>
                    <td>$event->ResourceId</td>
                    <td>$event->EventType</td>
                    <td>".date('d/m/Y H:i:s', $event->Date)."</td>
                 </tr>";
        }
        // return table with all events | all css are in this file ../assets/bootstrap/css/bootstrap.min.css
        return $tab."
                </tbody>
            </table>
        </div> </div>";
    }

}