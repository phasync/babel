<?php namespace Y; function fopen() { return "local"; } return fopen("x") . \fopen("y") . namespace\fopen("z") . \Y\fopen(1);
