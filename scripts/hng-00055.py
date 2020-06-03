# HNG Stage 2 Task.


def hng_profile(name, hng_id, language):
    """ A function that returns a simple profile
        of a HNG intern.

        INPUTS - 
        name (str): Name of the intern
        hng_id (str): ID of the intern
        language (str): Preferred language of the intern

        OUTPUT - 
        profile (str): Returns a string of words
    """
    profile = "Hello World, this is {} with HNGi7 ID {} using {} for stage 2 task."\
        .format(name, hng_id, language)

    return profile


def main(): 
    name = "Ademola Olokun"
    hng_id = "HNG-00055"
    language = "Python"

    profile = hng_profile(name, hng_id, language)
    print(profile, flush=True)


if __name__ == '__main__':
    main()