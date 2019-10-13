import os

__all__ = ["Settings"]


class Settings(object):
    def __init__(self, key):
        self._key = key

    @staticmethod
    def get_flag():
        return os.environ.get('FLAG')
