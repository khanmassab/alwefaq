/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:53 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: fullcalendar.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: fullcalendar.js
 */

import { Calendar } from '@fullcalendar/core/main.js';
import bootstrapPlugin from '@fullcalendar/bootstrap/main.js';
import dayGridPlugin from '@fullcalendar/daygrid/main.js';
import interactionPlugin from '@fullcalendar/interaction/main.js';
import listPlugin from '@fullcalendar/list/main.js';
import timegridPlugin from '@fullcalendar/timegrid/main.js';
import timelinePlugin from '@fullcalendar/timeline/main.js';

const calendarPlugins = {
  bootstrap: bootstrapPlugin,
  dayGrid: dayGridPlugin,
  interaction: interactionPlugin,
  list: listPlugin,
  timeGrid: timegridPlugin,
  timeline: timelinePlugin
}

export { Calendar, calendarPlugins };
