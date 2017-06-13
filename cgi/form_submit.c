/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   form_submit.c                                      :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: scollet <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2017/06/03 21:44:46 by scollet           #+#    #+#             */
/*   Updated: 2017/06/03 21:44:47 by scollet          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include <stdlib.h>
#include <stdio.h>
#include <dirent.h>
#include <unistd.h>
#include "ccgi-1.2/ccgi.h"

/*
**  Compile notes : gcc -o form_submit.cgi form_submit.c
*/

int   submit_form(CGI_value *form_value)
{
  FILE  *data;
  DIR   *directory;

  /*
  **  TODO : Deposit file in specified directory;
  */

  directory = opendir("~/web-landing/testdata");
  data = fopen(form_value[0], "r");
  fclose(data);
  closedir(directory);
  unlink(form_value[0]);
  return (1);
}

CGI_value   *collect_form(CGI_varlist *form_list, CGI_value *form_value)
{
  form_list = CGI_get_all("/tmp/data-submission-XXXXXX");
  form_value = CGI_lookup_all(form_list, "file-select");
  if (0 == form_value || 0 == form_value[1])
    return(0);
  return (form_value);
}

int   main(int argc, char **argv)
{
    CGI_varlist *form_list;
    CGI_value   *form_value;

    if (1 > (collect_form(form_list, form_value) && write(2, "Error collecting form ... exiting.", 34)))
      exit(-1);
    if (1 > (submit_form(form_value) && write(2, "Error submitting form ... exiting." , 34)))
      exit(-1);
    CGI_free_varlist(form_list);
    return (0);
}
